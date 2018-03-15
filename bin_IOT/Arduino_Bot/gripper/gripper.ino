#include <Servo.h>
void grip(void);
void ungrip(void);
void moveup(void);
void movedown(void);
void gripper();
Servo myservo1;
Servo myservo2;
int pos = 0;    
void setup() {
  myservo1.attach(9); 
  myservo2.attach(10);
}

void loop()
{
 gripper();
 
}
void gripper()
{
  movedown();
  delay(500);
  ungrip();
  delay(500);
  grip();
  delay(500);
  moveup();
  delay(2000);
}
void ungrip()
{
  for (pos = 180; pos >= 10; pos -= 1)
  { 
    myservo2.write(pos);                    
  }
  
}
void grip()
{
  for (pos = 0; pos <= 100; pos += 1)
  { 
    myservo2.write(pos);
    }
}
void movedown()
{
  for (pos = 0; pos <= 130; pos += 1) 
  { 
    myservo1.write(pos); 
     }
    
}
void moveup()
{                                
  for (pos = 180; pos >= 0; pos -= 1)
  { 
    myservo1.write(pos);              
}
}
  






