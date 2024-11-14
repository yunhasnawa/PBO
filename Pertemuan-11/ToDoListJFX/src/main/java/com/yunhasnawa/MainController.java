package com.yunhasnawa;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ListView;
import javafx.scene.control.TextField;

public class MainController
{
    @FXML
    Button btnTambah;
    @FXML
    TextField txtKegiatan;
    @FXML
    ListView<String> lstDaftarKegiatan;

    public void onBtnTambah_Action(ActionEvent actionEvent)
    {
        // Mengambil string yang diinputkan oleh pengguna ke txtKegiatan
        String kegiatan = this.txtKegiatan.getText();

        // Menambahkan kegiatan ke dalam ListView
        this.lstDaftarKegiatan.getItems().add(kegiatan);

        // Alert "berhasil disimpan"
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setContentText("Kegiatan berhasil disimpan!");
    }
}
