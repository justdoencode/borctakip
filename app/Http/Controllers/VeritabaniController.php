<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorclularModel;
use App\Models\BorcModel;

class VeritabaniController extends Controller
{


  //EKLEME İŞLEMLERİ

  //Borçlu Eklemek İçin
  public function borcluEkle(Request $borclu){
    BorclularModel::create([
      "ad"=>$borclu->ad,
      "soyad"=>$borclu->soyad,
      "telefon"=>$borclu->telefon,
      "adres"=>$borclu->adres,
      "kurum"=>$borclu->kurum,
    ]);

    return view('borcluekle');
  }


  //Borç Eklemek İçin
  public function borcEkle(Request $borc){

    //Yeni Borcun Borçluya Eklenmesi
    $id=$borc->id;//Seçilen Kişini id numarası
    $borclu=BorclularModel::find($id);//Seçilen kişi veritabanından bulundu

    $toplamBorcData=$borclu->toplamborc;
    $yeniBorc=$borc->borcTutari+$toplamBorcData;//Yeni gelen borc+veritabanındaki toplam borç toplandı

    BorclularModel::where('id',$id)->update([
      'toplamborc'=>$yeniBorc,
    ]);

    //Borçlar Veritabanına Ekler

    $isim=$borclu->ad." ".$borclu->soyad;
    BorcModel::create([
      "borclu"=>$isim,
      "borc_baslangic_tarihi"=>$borc->borcBaslangic,
      "borc_bitis_tarihi"=>$borc->borcBitis,
      "para_turu"=>$borc->paraTuru,
      "borc_miktari"=>$borc->borcTutari,
      "aciklama"=>$borc->aciklama,
    ]);
    return redirect()->route('borclarpage');

  }
  /////////////////////////////////////////////////////////////////////


  //VERİ ÇEKME İŞLEMŞERİ

  //Borç Ekle Sayfasına Borçluları Çekiyor
  public function borcEklePage(){
    $veriler=BorclularModel::get();
    return view('borcekle',array('veriler'=>$veriler));
  }

  //Borçlular Sayfasına Borçluları Çekiyor
  public function borclularPage(){
    $veriler=BorclularModel::get();
    return view('borclular',array('veriler'=>$veriler));
  }

  //Borçlar Sayfasına Verileri Çekiyor
  public function borclarPage(){
    $veriler=BorcModel::get();
    return view('borclar',array('veriler'=>$veriler));
  }


///////////////////////////////////////////////////////////////////////////////7

//VERİ SİLME

//Borç silme işlemi
public function borcSil(int $id){

  BorcModel::where('id',$id)->delete();
  return redirect()->route('borclarpage');
}

//Borçlu silme işlemi
public function borcluSil(int $id){

  BorclularModel::where('id',$id)->delete();
  return redirect()->route('borclularpage');
}


}
