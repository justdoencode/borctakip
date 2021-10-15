<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorclularModel;
use App\Models\BorclarModel;
use App\Models\ParaTuruModel;

class VeritabaniController extends Controller
{


  //EKLEME İŞLEMLERİ

  //Borçlu Eklemek İçin
  public function borcluEkle(Request $borclu){


    BorclularModel::create([
      "borclu_ad"=>$borclu->borclu_ad,
      "borclu_soyad"=>$borclu->borclu_soyad,
      "borclu_telefon"=>$borclu->borclu_telefon,
      "borclu_adres"=>$borclu->borclu_adres,
      "borclu_kurum"=>$borclu->borclu_kurum,
    ]);

    return redirect()->back()->with('successMessage', 'Borçlu Başarılı Bir Şekilde Eklendi');
  }


  //Borç Eklemek İçin
  public function borcEkle(Request $borc){

    //Yeni Borcun Borçluya Eklenmesi
    $id=$borc->borclu_id;//Seçilen Kişini id numarası
    $borclu=BorclularModel::find($id);//Seçilen kişi veritabanından bulundu


    if($borc->para_id==1)
    {
      $yeniToplamBorc=($borclu->toplam_tl_borc)+($borc->borcTutari);
      BorclularModel::where('borclu_id',$id)->update([
        'toplam_tl_borc'=>$yeniToplamBorc,
      ]);
    }


    elseif ($borc->para_id==2) {
      $yeniToplamBorc=($borclu->toplam_dolar_borc)+($borc->borcTutari);
      BorclularModel::where('borclu_id',$id)->update([
        'toplam_dolar_borc'=>$yeniToplamBorc,
      ]);
    }

    //Borçlar Veritabanına Ekler
    BorclarModel::create([
      "borclu_id"=>$id,
      "borc_baslangic_tarihi"=>$borc->borcBaslangic,
      "borc_bitis_tarihi"=>$borc->borcBitis,
      "para_turu_id"=>$borc->para_id,
      "borc_miktari"=>$borc->borcTutari,
      "aciklama"=>$borc->aciklama,
    ]);
    return redirect()->back()->with('successMessage', 'Borç Başarıyla Eklendi');

  }



  /////////////////////////////////////////////////////////////////////


  //VERİ ÇEKME İŞLEMŞERİ

  //Borç Ekle Sayfasına Borçluları Çekiyor
  public function borcEklePage(){
    $veriler=BorclularModel::get();
    $paraTurleri=ParaTuruModel::get();
    return view('borcekle',array('veriler'=>$veriler,'paraTurleri'=>$paraTurleri));
  }

  //Borçlular Sayfasına Borçluları Çekiyor
  public function borclularPage(){
    $veriler=BorclularModel::get();
    return view('borclular',array('veriler'=>$veriler));
  }

  //Borçlar Sayfasına Verileri Çekiyor
  public function borclarPage(){

    $veriler=BorclarModel::get();

    return view('borclar',array('veriler'=>$veriler));
  }


///////////////////////////////////////////////////////////////////////////////7

//VERİ SİLME

//Borç silme işlemi
public function borcSil(int $borc_id){

  $borc=BorclarModel::find($borc_id);//Borç verilerini alma
  $borclu=BorclularModel::find($borc->borclu_id);//Borçluyu bulma


  BorclarModel::where('borc_id',$borc_id)->delete();//Borçlar Tablosundan Borcu Silme

  //Para Türü Kontrolü İle Borçludan Borcun düşmesi
  if($borc->para_turu_id==1){
    $toplamTlBorc=$borclu->toplam_tl_borc;
    $yeniToplamTlBorc=$toplamTlBorc-$borc->borc_miktari;

    BorclularModel::where('borclu_id',$borclu->borclu_id)->update([
      'toplam_tl_borc'=>$yeniToplamTlBorc,
    ]);
    return redirect()->back()->with('successMessage', 'Borç Başarıyla Silindi');
  }

  elseif($borc->para_turu_id==2){
    $toplamDolarBorc=$borclu->toplam_dolar_borc;
    $yeniToplamDolarBorc=$toplamDolarBorc-$borc->borc_miktari;

    BorclularModel::where('borclu_id',$borclu->borclu_id)->update([
      'toplam_dolar_borc'=>$yeniToplamDolarBorc,
    ]);
    return redirect()->back()->with('successMessage', 'Borç Başarıyla Silindi');
  }

}



//Borçlu silme işlemi
public function borcluSil(int $borclu_id){

  $borclu=BorclularModel::find($borclu_id);

  if($borclu->toplam_tl_borc>0 || $borclu->toplam_dolar_borc>0){
    return redirect()->back()->with('errorMessage', 'Borcu Olan Borçlu Silinemez!');
  }

  BorclularModel::where('borclu_id',$borclu_id)->delete();
  return redirect()->back()->with('successMessage', 'Borçlu Başarıyla Silindi');
}


}
