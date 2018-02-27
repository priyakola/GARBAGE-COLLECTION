#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include<ESP8266WebServer.h>

const char* ssid = "rk";
const char* password = "87654321";

unsigned long update_db_interval = 1000;

uint8_t bot_ID = 1;//ID of bin
uint8_t bot_status = 0;
uint8_t bot_location = 1;
uint8_t bot_level = 21;
//session variables

String location[10];
unsigned long present_ms = 0, last_ms = 0, update_db, time_ms = 0;

String server = "http://192.168.43.195/";
int port = 80; //default port
String response;
String ard_data;

HTTPClient http;//http client object to communicate with website

void setup() {
  // put your setup code here, to run once:
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  present_ms = millis();
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
 ///   Serial.print(".");
  }
// / Serial.println(".");
 // /Serial.println("Connected Successfully");
  req_server();
}

void loop() {

  present_ms = millis();

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
    String url = "bin_IOT/get_bin_data.php/?bot_id=";
    url += String(bot_ID);
    url += "&bot_status=";
    url += String(bot_status);
    url += "&bot_level=";
    url += String(bot_level);
    url += "&bot_location=";
    url += String(bot_location);

    String request = server + url;

    http.begin(request);
   // Serial.println(request);
    int response_code = http.GET();
    if (response_code == HTTP_CODE_OK)
    {
      response = http.getString();
      parse_response();
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
  for(int i = 0; i < (k-1) ; i++)
  {
    location[i] = response.substring(limits[i], limits[i+1] - 1);
  //  Serial.print(location[i] + " ");
  Serial.print(location[i]);
    
  }
 // Serial.println(" ");
}


