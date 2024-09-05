public class Main {
    public static void main(String[] args)
    {
        // Membaca input dari console
        // 3 parameter: hutang, bunga, jumlah cicilan
        double hutang = 0; // Double.parseDouble(args[0]);
        float bunga = 0; //Float.parseFloat(args[1]);
        int jumlahCicilan = 0; //Integer.parseInt(args[2]);

        // Optimasi parameter
        // Contoh parameter kreditor.jar -h=100000 -b=15 -jc=5
        for(int i = 0; i < args.length; i++)
        {
            String[] split = args[i].split("=");
            // split = ["-h", "100000"]
            String param = split[0];
            String nilai = split[1];
            switch (param)
            {
                case "-h":
                    hutang = Double.parseDouble(nilai);
                    break;
                case "-b":
                    bunga = Float.parseFloat(nilai);
                    break;
                default:
                    jumlahCicilan = Integer.parseInt(nilai);
            }
        }

        System.out.println("Hutang         : " + hutang);
        System.out.println("Bunga          : " + bunga);
        System.out.println("Jumlah Cicilan : " + jumlahCicilan);

        // Hitung jumlah total hutang yang harus dibayar
        double totalBayar = hutang + (hutang * bunga / 100);
        System.out.println("----------------");
        System.out.println("Total Bayar    : " + totalBayar);

        // Nominal yang dibayarkan tiap kali angsuran
        double angsuran = totalBayar / jumlahCicilan;

        // Cetak header tabel di layar
        System.out.println("+--------------+--------------+---------------+");
        System.out.println("| Angsuran Ke- | Jumlah Bayar | Sisa Pinjaman |");
        System.out.println("+--------------+--------------+---------------+");

        // Cetak badan (body) dari tabelnya
        for(int i = 0; i < jumlahCicilan; i++)
        {
            // Data-data yang ditampilkan
            int angsuranKe = i + 1; // 14
            double jumlahBayar = angsuran; // 14
            double sisaPinjaman = totalBayar - (angsuran * angsuranKe); // 15

            // Dijadikan string dulu, untuk mengetahui panjang karakternya.
            String strAngsuranKe = String.valueOf(angsuranKe);
            String strJumlahBayar = String.valueOf(jumlahBayar);
            String strSisaPinjaman = String.valueOf(sisaPinjaman);

            // Menghitung jumlah spasi yang diperlukan untuk membuat rata kanan
            int jmlSpasiAngsuranKe = (14 - strAngsuranKe.length());
            int jmlSpasiJumlahBayar = (14 - strJumlahBayar.length());
            int jmlSpasiSisaPinjaman = (15 - strSisaPinjaman.length());

            // Menambahkan spasi ke masing-masing strData
            for(int j = 0; j < jmlSpasiAngsuranKe; j++)
                strAngsuranKe = (" " + strAngsuranKe);
            for(int j = 0; j < jmlSpasiJumlahBayar; j++)
                strJumlahBayar = (" " + strJumlahBayar);
            for(int j = 0; j < jmlSpasiSisaPinjaman; j++)
                strSisaPinjaman = (" " + strSisaPinjaman);

            System.out.println("|" + strAngsuranKe + "|"
                    + strJumlahBayar + "|"
                    + strSisaPinjaman + "|");
        }

        // Bagian bawah tabel
        System.out.println("+--------------+--------------+---------------+");
    }
}