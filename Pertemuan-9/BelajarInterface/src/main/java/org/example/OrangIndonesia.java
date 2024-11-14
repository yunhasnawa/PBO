package org.example;

public class OrangIndonesia extends Manusia
{
    public OrangIndonesia(String nama)
    {
        super(nama);
    }

    @Override
    public void berjalan()
    {
        System.out.println(nama + " sedang berjalan di Indonesia");
    }
}
