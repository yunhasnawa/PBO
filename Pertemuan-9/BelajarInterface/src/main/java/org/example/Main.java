package org.example;

public class Main
{
    public static void main(String[] args)
    {
        Superman clark = new Superman("Clark Kent");
        clark.berjalan();
        clark.terbang();

        // Manusia biasa
        Manusia suparman = new Manusia("Suparman");
        //suparman.terbang(); // Error
        suparman.berjalan();

        // Apakah Clark Kent itu manusia biasa?
        // Ya!
        Manusia clarkMenyamar = clark;
        clarkMenyamar.berjalan();
        //clarkMenyamar.terbang(); // <-- Error, karena Manusia tidak punya method terbang

        // Apakah Clark Kent itu entitas terbang?
        EntitasTerbang clarkTerbang = clark; // up casting
        clarkTerbang.terbang();
        //clarkTerbang.berjalan(); // <-- Error, karena EntitasTerbang tidak punya method berjalan

        // Kalau ada method yang di-override, kemudian
        // dilakukan upcasting, maka yang dipanggil yang
        // di superclass atau yang di subclass?
        OrangIndonesia atifWinda = new OrangIndonesia("AtifWinda");
        atifWinda.berjalan();
        Manusia m = atifWinda; // Upcasting
        m.berjalan(); // <-- Yang dijalankan adalah method berjalan() pada class OrangIndonesia

        // Apakah Clark Kent itu orang Indonesia?
        // Bukan!
        //OrangIndonesia clarkIndonesia = (OrangIndonesia) clark; // <-- Error, karena Superman bukanlah OrangIndonesia
    }
}