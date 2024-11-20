package com.yunhasnawa.core;

import java.util.Date;

public class Kegiatan
{
    private int id;
    private String nama;
    private Date ditambahkanPada;
    private boolean sudahSelesai;
    private Date selesaiPada;

    public Kegiatan(String nama)
    {
        this.id = 0;
        this.nama = nama;
        this.ditambahkanPada = new Date();
        this.sudahSelesai = false;
        this.selesaiPada = null;
    }

    @Override
    public String toString()
    {
        String result = this.nama;

        if (this.sudahSelesai)
        {
            result = "[Selesai] " + result;
        }
//        else
//        {
//            result = "[" + this.ditambahkanPada.toString() + "] " + result;
//        }

        return result;
    }

    public int getId()
    {
        return id;
    }

    public void setId(int id)
    {
        this.id = id;
    }

    public String getNama()
    {
        return nama;
    }

    public void setNama(String nama)
    {
        this.nama = nama;
    }

    public Date getDitambahkanPada()
    {
        return ditambahkanPada;
    }

    public void setDitambahkanPada(Date ditambahkanPada)
    {
        this.ditambahkanPada = ditambahkanPada;
    }

    public boolean isSudahSelesai()
    {
        return sudahSelesai;
    }

    public void setSudahSelesai(boolean sudahSelesai)
    {
        this.sudahSelesai = sudahSelesai;
    }

    public Date getSelesaiPada()
    {
        return selesaiPada;
    }

    public void setSelesaiPada(Date selesaiPada)
    {
        this.selesaiPada = selesaiPada;
    }
}
