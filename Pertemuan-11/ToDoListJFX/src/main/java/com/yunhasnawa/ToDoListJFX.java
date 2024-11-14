package com.yunhasnawa;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

public class ToDoListJFX extends Application
{
    @Override
    public void start(Stage stage) throws Exception
    {
        // Root layout
        Parent root = FXMLLoader.load(this.getClass().getResource("/MainView.fxml"));

        // Buat scene dulu yang rootnya dari FXML
        Scene scene = new Scene(root);

        // Masukkan scene ke stage
        stage.setScene(scene);

        stage.setTitle("ToDoListJFX - Version 0.1");
        stage.show();
    }
}
