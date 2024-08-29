public class Main
{
    public static void main(String[] args)
    {
        // Variabel dan Tipe data
        int x = 0;
        int y = 1;
        float a = 1.f;
        double b = 2.f;

        // Tipe data primitif vs Non-primitif
        // Tipe data primitif adalah tipe data bawaan Java
        // yang namanya diawali huruf kecil
        // Contohnya: int, float, double, char

        // Tipe data non-primitif disebut juga tipe data objek?
        // Cirinya, namanya diawali huruf kapital
        // Contoh: String
        String nama = "Yoppy Yunhasnawa";
        // Itu sama dengan:
        String nama2 = new String("Yoppy Yunhasnawa");
        // Seharusnya deklarasi variabel dengan tipe data objek
        // seperti di atas.
        // Tapi untuk tipe data objek data tertentu bisa disingkat seolah-olah
        // Dia adalah tipe data primitif.
        // Istilah tersebut dinamakan "Syntatic sugar"

        // Function
        // Adalah sesuatu yang mengolah input menjadi output
        // Menambahkan x dan y
        int hasilTambah = Main.tambah(x, y);

//        // Cara kalau tidak static
//        Main m = new Main();
//        m.tambah(x, y);

        // Perulangan
        int hasilTambahBanyak = Main.tambahBanyakAngka(1, 2, 3, 4);

        // Diganti dengan input dari args
        int[] inputAngka = new int[10];
        for(int i = 1; i < args.length; i++)
        {
            String input = args[i];
            // Konversi dari string menjadi integer
            int inputInt = Integer.parseInt(input);
            inputAngka[(i - 1)] = inputInt;
        }

        hasilTambahBanyak = Main.tambahBanyakAngka(inputAngka);

        // Pencabangan
        // Return true jika bilangan pada parameter adalah ganjil, dan false bila sebaliknya.
        boolean isGanjil = Main.isGanjil(99);

        // Menampilkan string
        System.out.println("Hasil Tambah: " + hasilTambah);
        System.out.println("Hasil Tambah Multi Angka: " + hasilTambahBanyak);
        System.out.println("Ganjil? " + isGanjil);

        // Mengambil nilai parameter dari console
        String namaPembuat = args[0];
        System.out.println("Program ini dibuat oleh: " + namaPembuat);

        // Contoh pemanggilan Class menjadi Objek
        SepedaMotor spdA = new SepedaMotor("Honda Vario", 2017);
        SepedaMotor spdB = new SepedaMotor("Honda Beat", 2022);

        spdA.nyalakan();
        spdB.nyalakan();

        spdA.jalan();
        spdB.jalan();
    }

    public static int tambah(int bilangan1, int bilangan2)
    {
        return bilangan1 + bilangan2;
    }

    public static int tambahBanyakAngka(int ...bilangan)
    {
        int hasil = 0;

        for(int i = 0; i < bilangan.length; i++)
        {
            hasil += bilangan[i];
        }

        return hasil;
    }

    public static boolean isGanjil(int angka)
    {
        if(angka % 2 == 0)
            return false;
        else
            return true;
    }
}