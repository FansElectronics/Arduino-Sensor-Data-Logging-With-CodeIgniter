#include <ESP8266WiFi.h>

const char* ssid = "FansElectronics"; // Nama WIFI kamu
const char* password = "TukangSolder#"; // Password Wifi
const char* host = "tryiot.online"; // Link website / Ip Server

int suhu, kecepatan, tegangan, count;
bool Parsing = false;
String dataPHP, data[8];
void setup()
{
  Serial.begin(9600);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
  }
}

void loop() {
  while (Serial.available()) {
    dataPHP = Serial.readStringUntil('\n');
    int q = 0;
    data[q] = "";
    for (int i = 0; i < dataPHP.length(); i++) {
      if (dataPHP[i] == '#') {
        q++;
        data[q] = "";
      }
      else {
        data[q] = data[q] + dataPHP[i];
      }
    }
    suhu = data[1].toInt();
    kecepatan = data[2].toInt();
    tegangan = data[3].toInt();
    dataPHP = "";
  }

  if (count >= 10) {
    WiFiClient client;
    if (client.connect(host, 80)) {
      String url = "demo/simple-datalog/main/update?suhu=" + String(suhu) + "&kecepatan=" + String(kecepatan) + "&tegangan=" + String(tegangan);
      client.print(String("GET /") + url + " HTTP/1.1\r\n" +
                   "Host: " + host + "\r\n" +
                   "Connection: close\r\n" +
                   "\r\n"
                  );
      client.stop();

    }
    else {
      client.stop();
    }
    count = 0;
  }
  delay(1000); // Jeda pembacaan setiap 5 detik
  count++;
}
