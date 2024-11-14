package org.example;

public class Superman extends Manusia implements EntitasTerbang
{
    public Superman(String nama)
    {
        super(nama);
    }

    @Override
    public void terbang()
    {
        System.out.println(nama + " sedang terbang");
    }

    public void pengelihatanLaser()
    {
        System.out.println(nama + " sedang menggunakan penglihatan laser");
    }
}
