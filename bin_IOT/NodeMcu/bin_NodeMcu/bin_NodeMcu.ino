#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include<ESP8266WebServer.h>

// defines pins numbers
const int trigPin = 5;  //D1
const int echoPin = 4;  //D2

// defines variables
long duration;
int distance;
uint8_t bin_height = 30;

//Enter your WiFi Credentials
const char* ssid = "rk";
const char* password = "87654321";

unsigned long update_db_interval = 1000;
//database update interval - 1 second

uint8_t bin_ID = 1;//ID of bin
uint8_t bin_status = 0;
uint8_t bin_location = 1;
uint8_t bin_level = 29;


//session variables

unsigned long present_ms = 0, last_ms = 0, update_db, time_ms = 0;

String server = "http://192.168.43.195/"; //Ip address of server
int port = 80; //default http port
String response;
String ard_data;

HTTPClient http;//http client object to communicate with website

void setup() {
  // put your setup code here, to run once:
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the echoPin as an Input
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  present_ms = millis();
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    //Serial.print(".");
  }
  req_server();
}

void loop() {

  bin_cal();
  present_ms = millis();

  // Requesting Website every 1second
  if (present_ms - update_db > update_db_interval)
  {
    req_server();
    update_db = present_ms;
  }
}

void req_server()
{
  if (WiFi.status() == WL_CONNECTED)
  {
    String url = "bin_IOT/update_bin.php/?bin_id=";
    url += String(bin_ID);
    url += "&bin_status=";
    url += String(bin_status);
    url += "&bin_level=";
    url += String(bin_level);
    url += "&bin_location=";
    url += String(bin_location);

    String request = server + url;
    //Serial.priintln(request);
    http.begin(request);
    Serial.println(request);
    int response_code = http.GET();
    if (response_code == HTTP_CODE_OK)
    {
      response = http.getString();
      //parse_response();
    }

    else {
      //error
      //Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(response_code).c_str());
    }
    http.end();
    delay(10);
  }
}



void parse_response()
{
  // Parsing the response
  // Not needed for bin code because there is no response from server
  int l = response.length(), k = 0;
  int limits[100] = {0};
  for (int i = 0; i < l ; i++)
  {
    if (response[i] == '#')
    {
      limits[k] = i + 1;
      k++;
    }
  }
  // Serial.println(k);
}


void bin_cal()
{

digitalWrite(trigPin, LOW);
delayMicroseconds(2);

// Sets the trigPin on HIGH state for 10 micro seconds
digitalWrite(trigPin, HIGH);
delayMicroseconds(10);
digitalWrite(trigPin, LOW);

// Reads the echoPin, returns the sound wave travel time in microseconds
duration = pulseIn(echoPin, HIGH);

// Calculating the distance
distance= duration*0.034/2;
// Prints the distance on the Serial Monitor
Serial.print("Distance: ");
Serial.print(distance);
//bin_level=distance;

//Calculating level of dustbin
bin_level=bin_height-distance;
Serial.print("  bin level: ");
Serial.println(bin_level);
delay(2000);

}
