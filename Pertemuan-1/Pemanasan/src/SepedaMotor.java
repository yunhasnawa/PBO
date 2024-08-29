public class SepedaMotor
{
    // Deskriptor-1: Properti
    // Berupa kata benda
    // Sesuatu yang dimiliki oleh class
    private String merk;
    private int tahunPembuatan;

    // Deskriptor-2: Method
    // Berupa kata kerja
    // Sesuatu yang bisa DILAKUKAN oleh class
    public void nyalakan()
    {
        System.out.println("Greeng!");
    }

    public void jalan()
    {
        System.out.println("Bremmm! Sepeda motor " + this.merk +
                " berjalan di jalan raya");
    }

    // Konstruktor
    public SepedaMotor(String merk, int tahunPembuatan)
    {
        this.merk = merk;
        this.tahunPembuatan = tahunPembuatan;
    }
}
