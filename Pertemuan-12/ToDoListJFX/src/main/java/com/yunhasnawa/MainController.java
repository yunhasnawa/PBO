package com.yunhasnawa;

import com.yunhasnawa.core.Kegiatan;
import com.yunhasnawa.core.ToDoListModel;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ListView;
import javafx.scene.control.TextField;

import java.util.ArrayList;

public class MainController implements ChangeListener<Kegiatan>
{
    @FXML
    Button btnTambah;
    @FXML
    TextField txtKegiatan;
    @FXML
    ListView<Kegiatan> lstDaftarKegiatan;

    private ToDoListModel model;

    public MainController()
    {
        this.model = new ToDoListModel();
    }

    @FXML
    public void initialize()
    {
        // Inisialisasi ListView
        // Menambahkan listener ketika salah satu item diklik
        this.lstDaftarKegiatan.getSelectionModel().selectedItemProperty().addListener(this);

        // Mengambil daftar kegiatan dari database
        ArrayList<Kegiatan> savedKegiatan = this.model.selectAllKegiatan();
        this.lstDaftarKegiatan.getItems().addAll(savedKegiatan);
    }

    public void onBtnTambah_Action(ActionEvent actionEvent)
    {
        // Mengambil string yang diinputkan oleh pengguna ke txtKegiatan
        String namaKegiatan = this.txtKegiatan.getText();
        Kegiatan kegiatan = new Kegiatan(namaKegiatan);

        // Menyimpan kegiatan ke dalam database
        this.model.insertKegiatan(kegiatan);
        this.lstDaftarKegiatan.getItems().add(kegiatan);
        this.txtKegiatan.clear();

        // Alert "berhasil disimpan"
        // Alert alert = new Alert(Alert.AlertType.INFORMATION);
        // alert.setContentText("Kegiatan berhasil disimpan!");
        // alert.show();
    }

    @Override
    public void changed(ObservableValue<? extends Kegiatan> observableValue, Kegiatan kegiatan, Kegiatan t1) {
        this.txtKegiatan.setText(kegiatan.getNama());
    }
}
