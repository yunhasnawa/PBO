package org.example;

public class Manusia
{
    protected String nama;

    public Manusia(String nama)
    {
        this.nama = nama;
    }

    public void berjalan()
    {
        System.out.println(nama + " sedang berjalan");
    }
}
