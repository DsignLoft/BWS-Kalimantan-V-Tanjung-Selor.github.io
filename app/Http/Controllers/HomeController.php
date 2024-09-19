<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $title = 'Homepage';
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        $faqs = DB::table('nsm_faqs')->where('faq_active', 1)->orderBy('faq_sort', 'ASC')->get();
        $services = DB::table('nsm_services')->where('service_active', 1)->orderBy('service_priority', 'ASC')->get();
        $banners = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'homepage'))->orderBy('urutan', 'ASC')->get();
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->get();
        $ads = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'ads'))->orderBy('urutan', 'ASC')->get();
        $infografis = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'infografis'))->orderBy('urutan', 'ASC')->get();
        $galleries = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'gallery'))->orderBy('urutan', 'ASC')->get();
        $services = DB::table('nsm_services')->where('service_active', 1)->orderBy('service_priority', 'ASC')->get();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'ASC')->get();
        return view('home.index', compact('setting', 'title', 'titles', 'informations', 'faqs', 'services', 'setting', 'banners', 'news', 'ads', 'infografis', 'galleries','services', 'footers'));
    }
    
    public function layananHidrologiSih3BerauKelai()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $title = "Layanan Hidrologi";
        $titles = DB::table('nsm_titles')->first();
        $hydrology = DB::table('nsm_services_hydrology')->where(array('sh_st' => 1, 'sh_ws' => 'berau_kelai'))->get();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $initialMarkers = [];
        foreach ($hydrology as $hy) {
            $data = [
            'position' => [
                    'lat' => $hy->sh_lat,
                    'lng' => $hy->sh_lng  
                ],
                'draggable' => false,
                'title' => $hy->sh_title,
                'device' => $hy->sh_device,
                'loct' => $hy->sh_loct,
                'kab' => $hy->sh_kab,
                'prov' => $hy->sh_prov,
                'tma' => $hy->sh_tma,
                'clr' => $hy->sh_color,
                'st' => $hy->sh_st,
                'img' => $hy->sh_img,
                'update' => $hy->sh_update  
            ];
            array_push($initialMarkers, $data);
        }
        return view('home.hidrologi_service_bk', compact('setting', 'title', 'titles', 'initialMarkers', 'footers', 'hydrology'));
    }
    
    public function layananHidrologiSih3Sesayap()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $title = "Layanan Hidrologi";
        $titles = DB::table('nsm_titles')->first();
        $hydrology = DB::table('nsm_services_hydrology')->where(array('sh_st' => 1, 'sh_ws' => 'sesayap'))->get();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $initialMarkers = [];
        foreach ($hydrology as $hy) {
            $data = [
            'position' => [
                    'lat' => $hy->sh_lat,
                    'lng' => $hy->sh_lng  
                ],
                'draggable' => false,
                'title' => $hy->sh_title,
                'device' => $hy->sh_device,
                'loct' => $hy->sh_loct,
                'kab' => $hy->sh_kab,
                'prov' => $hy->sh_prov,
                'tma' => $hy->sh_tma,
                'clr' => $hy->sh_color,
                'st' => $hy->sh_st,
                'img' => $hy->sh_img,
                'update' => $hy->sh_update  
            ];
            array_push($initialMarkers, $data);
        }
        return view('home.hidrologi_service_bl', compact('setting', 'title', 'titles', 'initialMarkers', 'footers', 'hydrology'));
    }
    
    public function layananHidrologiForm()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $title = "Permohonan Informasi";
        $titles = DB::table('nsm_titles')->first();
        $hydrology = DB::table('nsm_services_hydrology')->where(array('sh_st' => 1, 'sh_ws' => 'sesayap'))->get();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.formulir.hidrologi_service', compact('setting', 'title', 'titles', 'footers', 'informations'));
    }
    
    public function laporanBanjirForm()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $title = "Layanan Lapor Kejadian Bencana Banjir";
        $titles = DB::table('nsm_titles')->first();
        $hydrology = DB::table('nsm_services_hydrology')->where(array('sh_st' => 1, 'sh_ws' => 'sesayap'))->get();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.formulir.laporan_banjir', compact('setting', 'title', 'titles', 'footers', 'informations'));
    }
    
    public function pengaduanAspirasiForm()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $title = "Layanan Pengaduan dan Aspirasi";
        $titles = DB::table('nsm_titles')->first();
        $hydrology = DB::table('nsm_services_hydrology')->where(array('sh_st' => 1, 'sh_ws' => 'sesayap'))->get();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.formulir.pengaduan_aspirasi', compact('setting', 'title', 'titles', 'footers', 'informations'));
    }
    
    public function layananSurveiForm()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $title = "Survei Kepuasan Pelayanan";
        $titles = DB::table('nsm_titles')->first();
        $hydrology = DB::table('nsm_services_hydrology')->where(array('sh_st' => 1, 'sh_ws' => 'sesayap'))->get();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.formulir.layanan_survei', compact('setting', 'title', 'titles', 'footers', 'informations'));
    }
    
    public function layananPengaduanForm()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $title = "Layanan Pengaduan dan Aspirasi";
        $titles = DB::table('nsm_titles')->first();
        $hydrology = DB::table('nsm_services_hydrology')->where(array('sh_st' => 1, 'sh_ws' => 'sesayap'))->get();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.formulir.layanan_pengaduan', compact('setting', 'title', 'titles', 'footers', 'informations'));
    }
    
    public function layananRekomtek()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $title = "Layanan Rekomtek";
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.rekomtek_service', compact('setting', 'title', 'titles', 'footers', 'informations'));
    }
    
    public function detailRekomtek(Request $request, $id)
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Detail Rekomtek";
        $data = $id;
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.rekomtek_detail', compact('title','setting','titles','footers', 'data', 'informations'));
    }
    
    public function layananKlimatologi()
    {
        $title = "Layanan Klimatologi";
        $titles = DB::table('nsm_titles')->first();
        $klimatologi = DB::table('nsm_services_klimatologi')->where('klm_st', 1)->get();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $initialMarkers = [];
        foreach ($klimatologi as $klm) {
            $data = [
            'position' => [
                    'lat' => $klm->klm_lat,
                    'lng' => $klm->klm_lng  
                ],
                'draggable' => false,
                'title' => $klm->klm_title,
                'device' => $klm->klm_device,
                'loct' => $klm->klm_loct,
                'kab' => $klm->klm_kab,
                'prov' => $klm->klm_prov,
                'otomatis' => $klm->klm_otomatis,
                'manual' => $klm->klm_manual,
                'st' => $klm->klm_st,
                'img' => $klm->klm_img,
                'update' => $klm->klm_update  
            ];
            array_push($initialMarkers, $data);
        }
        return view('home.klimatologi', compact('title', 'titles', 'initialMarkers', 'footers'));
    }

    public function history()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'profile_history_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'profile_history')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Sejarah";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.history', compact('setting', 'data', 'title','titles','footers','news','informations'));
    }

    public function visiMisi()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'visi_misi_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'visi_misi')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Visi dan Misi";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.visi_misi', compact('title', 'data', 'setting','titles','footers','news','informations'));
    }

    public function structurOrganisasi()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'structure_organization_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'structure_organization')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Struktur Organisasi";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.structur_organisasi', compact('title', 'data', 'setting','titles','footers','news','informations'));
    }
    
    public function infrastukturBendung()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'infrastruktur_bendung_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'infrastruktur_bendung')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Infrastruktur Bendung";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.infrastruktur.bendung', compact('title', 'data', 'setting','titles','footers','news','informations'));
    }
    
    public function infrastukturBendungan()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'infrastruktur_bendungan_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'infrastruktur_bendungan')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Infrastruktur Bendungan";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.infrastruktur.bendungan', compact('title', 'data', 'setting','titles','footers','news','informations'));
    }
    
    public function infrastukturEmbung()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'infrastruktur_embung_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'infrastruktur_embung')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Infrastruktur Embung";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.infrastruktur.embung', compact('title', 'data', 'setting','titles','footers','news','informations'));
    }
    
    public function infrastukturIrigrasi()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'infrastruktur_irigrasi_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'infrastruktur_irigrasi')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Infrastruktur Irigrasi";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.infrastruktur.irigrasi', compact('title', 'data', 'setting','titles','footers','news','informations'));
    }
    
    public function infrastukturPantai()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'infrastruktur_pantai_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'infrastruktur_pantai')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Infrastruktur Pantai";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.infrastruktur.pantai', compact('title', 'data', 'setting','titles','footers','news','informations'));
    }
    
    public function perencanaanRpsda()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'pola_rpsda_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'pola_rpsda')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Perencanaan Pola dan RPSDA";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.perencanaan.rpsda', compact('title', 'data', 'setting','titles','footers','news','informations'));
    }
    
    public function perencanaanLakip()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'lakip_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'lakip')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Perencanaan Lakip";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.perencanaan.lakip', compact('title', 'data', 'setting','titles','footers','news','informations'));
    }
    
    public function news()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Berita Balai";
        $news = DB::table('nsm_news')->where(array('news_type' => 'news', 'news_active' => 1))->orderBy('news_sort', 'DESC')->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.news.index', compact('title','setting','titles','footers','news','informations'));
    }
    
    public function detailNews(Request $request, $id)
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Detail News";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $detail = DB::table('nsm_news')->where('news_active', 1)->where('news_slug', $id)->first();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.news.detail', compact('title','setting','titles','footers','news','detail','informations'));
    }
    
    public function tracking()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Tracking";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.tracking', compact('title','setting','titles','footers','news','informations'));
    }
    
    public function contact()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Kontak";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.contact', compact('title','setting','titles','footers','news','informations'));
    }
    
    public function information()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Pengumuman";
        $news = DB::table('nsm_news')->where(array('news_type' => 'information', 'news_active' => 1))->orderBy('news_sort', 'DESC')->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.information', compact('title','setting','titles','footers','news','informations'));
    }
    
     public function planningRenstra()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Pengumuman";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.planning.renstra', compact('title','setting','titles','footers','informations','news'));
    }
    
    public function standartMaklumatPelayanan()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'maklumat_pelayanan_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'maklumat_pelayanan')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Maklumat Pelayanan";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.standart.maklumat_pelayanan', compact('title','data','setting','titles','footers','news','informations'));
    }
    
    public function standartLayananSidTerap()
    {
        $setting = array(
            'website_title' => DB::table('adm_settings')->where('setting_name', 'website_title')->value('setting'),
            'website_sparator' => DB::table('adm_settings')->where('setting_name', 'website_sparator')->value('setting'),
            'website_tagline' => DB::table('adm_settings')->where('setting_name', 'website_tagline')->value('setting'),
            'website_keyword' => DB::table('adm_settings')->where('setting_name', 'website_keyword')->value('setting'),
            'website_description' => DB::table('adm_settings')->where('setting_name', 'website_description')->value('setting'),
            'website_favicon' => DB::table('adm_settings')->where('setting_name', 'website_favicon')->value('setting'),
            'website_logo' => DB::table('adm_settings')->where('setting_name', 'website_logo')->value('setting'),
            'instagram' => DB::table('adm_settings')->where('setting_name', 'instagram')->value('setting'),
            'facebook' => DB::table('adm_settings')->where('setting_name', 'facebook')->value('setting'),
            'linkedin' => DB::table('adm_settings')->where('setting_name', 'linkedin')->value('setting'),
            'youtube' => DB::table('adm_settings')->where('setting_name', 'youtube')->value('setting'),
            'x' => DB::table('adm_settings')->where('setting_name', 'x')->value('setting'),
            'blogspot' => DB::table('adm_settings')->where('setting_name', 'blogspot')->value('setting'),
        );
        $data = array(
            'image' => DB::table('adm_settings')->where('setting_name', 'layanan_sidterap_image')->value('setting'),
            'text' => DB::table('adm_settings')->where('setting_name', 'layanan_sidterap')->value('setting'),
        );
        $titles = DB::table('nsm_titles')->first();
        $footers = DB::table('adm_carousel')->where(array('active' => 1, 'cat' => 'footer'))->orderBy('urutan', 'DESC')->get();
        $title = "Layanan SID Terap";
        $news = DB::table('nsm_news')->where('news_active', 1)->orderBy('news_sort', 'DESC')->limit(5)->get();
        $informations = DB::table('nsm_informations')->where('info_active', 1)->orderBy('info_sort', 'ASC')->get();
        return view('home.standart.maklumat_pelayanan', compact('title','data','setting','titles','footers','news','informations'));
    }
}
