package com.yunhasnawa.core;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class ToDoListModel
{
    // Database connection details
    private static final String DB_URL = "jdbc:mysql://localhost:8889/todo_list";
    private static final String USER = "root"; // Replace with your MySQL username
    private static final String PASSWORD = "root";

    private Connection connection;

    public ToDoListModel()
    {
        // Load the MySQL JDBC driver
        try
        {
            this.connection = DriverManager.getConnection(DB_URL, USER, PASSWORD);
        }
        catch (Exception e)
        {
            e.printStackTrace();
        }
    }

    public void insertKegiatan(Kegiatan kegiatan)
    {
        // Insert the new kegiatan into the database
        String sql = "INSERT INTO kegiatan (nama, ditambahkan_pada, sudah_selesai, selesai_pada) VALUES (?, ?, ?, ?)";

        try
        {
            PreparedStatement statement = this.connection.prepareStatement(sql);
            statement.setString(1, kegiatan.getNama());
            statement.setDate(2, new java.sql.Date(kegiatan.getDitambahkanPada().getTime()));
            statement.setBoolean(3, kegiatan.isSudahSelesai());
            statement.setDate(4, kegiatan.getSelesaiPada() == null ? null : new java.sql.Date(kegiatan.getSelesaiPada().getTime()));

            int rowsAffected = statement.executeUpdate();
            if (rowsAffected > 0)
                System.out.println("Data successfully saved!");
        }
        catch (Exception e)
        {
            e.printStackTrace();
        }
    }

    public ArrayList<Kegiatan> selectAllKegiatan()
    {
        // Select all kegiatan from the database
        ArrayList<Kegiatan> kegiatanList = new ArrayList<>();
        String sql = "SELECT * FROM kegiatan";

        try
        {
            PreparedStatement statement = this.connection.prepareStatement(sql);
            ResultSet resultSet = statement.executeQuery();

            while (resultSet.next())
            {
                Kegiatan kegiatan = new Kegiatan(resultSet.getString("nama"));
                kegiatan.setId(resultSet.getInt("id"));
                kegiatan.setDitambahkanPada(resultSet.getDate("ditambahkan_pada"));
                kegiatan.setSudahSelesai(resultSet.getBoolean("sudah_selesai"));
                kegiatan.setSelesaiPada(resultSet.getDate("selesai_pada"));

                kegiatanList.add(kegiatan);
            }
        }
        catch (Exception e)
        {
            e.printStackTrace();
        }

        return kegiatanList;
    }
}
