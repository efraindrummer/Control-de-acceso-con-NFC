
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>      // incluye libreria bus SPI
#include <MFRC522.h>      // incluye libreria especifica para MFRC522


const char* ssid = "ARRIS-E5A2";
const char* password =  "WWX7JVPPXPF3F794";

String ip= "http://192.168.0.2/ControlTotal/arduino/";
String salon = "301";
String mac1 = "";
String mac2 = "";
String mac3 = "";
String mac4 = "";
String mac5 = "";
String mac6 = "";
String mac7 = "";


///////////////////////

String MAC[7]={"","","","","","",""} ;
String MACO= "";


 
#define RST_PIN  D2      // constante para referenciar pin de reset
#define SS_PIN  D4      // constante para referenciar pin de slave select

MFRC522 mfrc522(SS_PIN, RST_PIN); // crea objeto mfrc522 enviando pines de slave select y reset

void setup() {

  
  Serial.begin(9600);     // inicializa comunicacion por monitor serie a 9600 bps
  SPI.begin();        // inicializa bus SPI
  mfrc522.PCD_Init();     // inicializa modulo lector

 ///////////////////////
  delay(10);
 
  WiFi.begin(ssid, password);

  Serial.print("Conectando...");
  while (WiFi.status() != WL_CONNECTED) { //Check for the connection
    delay(500);
    Serial.print(".");
  }

  Serial.print("Conectado con éxito, mi IP es: ");
  Serial.println(WiFi.localIP());
 
}

void loop() {
  if ( ! mfrc522.PICC_IsNewCardPresent()) // si no hay una tarjeta presente
    return;         // retorna al loop esperando por una tarjeta
  
  if ( ! mfrc522.PICC_ReadCardSerial())   // si no puede obtener datos de la tarjeta
    return;         // retorna al loop esperando por otra tarjeta
    
  Serial.print("UID:");       // muestra texto UID:
  for (byte i = 0; i < mfrc522.uid.size; i++) { // bucle recorre de a un byte por vez el UID
    if (mfrc522.uid.uidByte[i] < 0x10){   // si el byte leido es menor a 0x10
      Serial.print(" 0");     // imprime espacio en blanco y numero cero
    
      }
      else{         // sino
      Serial.print(" ");      // imprime un espacio en blanco
   
      }
    Serial.print(mfrc522.uid.uidByte[i], HEX);  // imprime el byte del UID leido en hexadecimal 
    MAC[i]=(mfrc522.uid.uidByte[i]);

  }//las variables que se asignaron en el vector se asignan a las que se mandaran al servidor
    mac1=MAC[0];
    mac2=MAC[1];
    mac3=MAC[2];
    mac4=MAC[3];
    mac5=MAC[4];
    mac6=MAC[5];
    mac7=MAC[6];
    //*************************
    MACO= MAC[0]+" "+MAC[1]+" "+MAC[2]+" "+MAC[3]+" "+MAC[4]+" "+MAC[5]+" "+MAC[6];
   Serial.println("-"+MACO);
     if(WiFi.status()== WL_CONNECTED){   //Check WiFi connection status

    HTTPClient http;
    String datos_a_enviar = ip+"esp-get.php?salon=" + salon + "&mac1=" + mac1 +  "&mac2=" + mac2 +  "&mac3=" + mac3 +  "&mac4=" + mac4 + "&mac5=" + mac5 + "&mac6=" + mac6  + "&mac7=" + mac7;
    //se igualan las variables a null
    MAC[0] = "";
    MAC[1] = "";
    MAC[2] = "";
    MAC[3] = "";
    MAC[4] = "";
    MAC[5] = "";
    MAC[6] = "";
    http.begin(datos_a_enviar);        //Indicamos el destino
    http.addHeader("Content-Type", "plain-text"); //Preparamos el header text/plain si solo vamos a enviar texto plano sin un paradigma llave:valor.

    int codigo_respuesta = http.GET();   //Enviamos el post pasándole, los datos que queremos enviar. (esta función nos devuelve un código que guardamos en un int)
    if(codigo_respuesta>0){
      Serial.println("Código HTTP ► " + String(codigo_respuesta));   //Print return code

      if(codigo_respuesta == 200){
        String cuerpo_respuesta = http.getString();
        Serial.println("El servidor respondió ▼ ");
        Serial.println(cuerpo_respuesta);

      }

    }else{

     Serial.print("Error enviando POST, código: ");
     Serial.println(codigo_respuesta);

    }

    http.end();  //libero recursos

  }else{

     Serial.println("Error en la conexión WIFI");

  }

  Serial.println();       // nueva linea
  mfrc522.PICC_HaltA();                   // detiene comunicacion con tarjeta
}
    
  
                    
