#include <DHT.h>

#define VPIN        A0
#define DHTPIN      2
#define DHTTYPE     DHT11
#define enA 2
#define enB 3

int pulsa = 0;
float rps, rpm, volt, suhu;
int jumlahPulsa, lastjumlahPulsa;
int interval = 500;
unsigned int waktulama, waktusekarang;

DHT dht(DHTPIN, DHTTYPE);
void setup() {
  Serial.begin(9600);
  dht.begin();

  pinMode(enA, INPUT_PULLUP);
  pinMode(enB, INPUT_PULLUP);

  attachInterrupt(0, encoder, CHANGE);
}

void loop() {
  waktusekarang = millis();
  if (waktusekarang - waktulama >= interval) {
    rps = (jumlahPulsa / 360.00) / 0.5;
    // rpm = (jumlahPulsa/360.00)/0.00833333;
    rpm = rps / 60;
    pulsa = 0;
    jumlahPulsa = 0;
    waktulama = waktusekarang;
  }
  suhu = dht.readTemperature();
  volt = ((analogRead(VPIN) * 0.00489) * 5);
  
}

void encoder() {
  if (digitalRead(enA) == digitalRead(enB)) {
    pulsa++;
  } else {
    pulsa--;
  }
  jumlahPulsa = pulsa / 2.5;
}
