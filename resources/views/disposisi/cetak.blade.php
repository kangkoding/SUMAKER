<style type="text/css">
        table {
            background: #fff;
            padding: 5px;
        }
        tr, td {
            border: table-cell;
            border: 1px  solid #444;
        }
        tr,td {
            vertical-align: top!important;
        }
        .separator {
            border-bottom: 2px solid #616161;
            margin: -1.3rem 0 1.5rem;
        }
        @media print{
            body {
                font-size: 12px;
                color: #212121;
            }
            nav {
                display: none;
            }
            table {
                width: 100%;
                font-size: 12px;
                color: #212121;
            }
            tr, td {
                border: table-cell;
                border: 1px  solid #444;
                padding: 8px!important;

            }
            tr,td {
                vertical-align: top!important;
            }

            .separator {
                border-bottom: 2px solid #616161;
                margin: -1rem 0 1rem;
            }

        }
</style>

<center>
    <!--<h3>KEMENTRIAN AGRARIA DAN TATA RUANG<br>
        BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA<br>
        KANTOR PERTANAHAN KABUPATEN SLEMAN<br>
        PROPINSI DAERAH ISTIMEWA YOGYAKARTA</h3>
    <h5>Jl. Dr. Radjimin. Telp. (0274) 869501,869502 Fax. (0274) 869144 Triharjo, Sleman, Kode Pos 55514</h5>-->
    <h3>{!! $dataKantor->nama_kantor !!}</h3>
    <h5>{{$dataKantor->alamat_kantor}}</h5>
    <div class="separator"></div>
    <br>
    <h3>LEMBAR DISPOSISI</h3>

    <table border="1" style="text-align: left; border-collapse: collapse; width: 98%;">
        <tr>
            <td width="25%" style="border-right: none !important;"><strong>No. Agenda</strong></td>
            <td width="25%" style="border-left: none !important;"><strong> : </strong>{{$dataSuratMasuk->nmr_agenda}}</td>
            <td width="25%" style="border-right: none !important;"><strong>Tingkat Keamanan</strong></td>
            <td width="25%" style="border-left: none !important;"><strong> : </strong>{{$dataSuratMasuk->tkt_keamanan}}</td>
        </tr>

        <tr>
            <td width="25%" style="border-right: none !important;"><strong>Tanggal Penerimaan</strong></td>
            <td width="25%" style="border-left: none !important;"><strong> : </strong>{{Carbon\Carbon::parse($dataSuratMasuk->tgl_diterima)->formatLocalized('%A, %d %B %Y %H:%I:%S')}}</td>
            <td width="25%" style="border-right: none !important;"><strong>Tanggal Penyelesaian</strong></td>
            <td width="25%" style="border-left: none !important;"><strong> : </strong></td>
        </tr>
    </table>
    <br>
    <table border="0" style="text-align: left; border-collapse: collapse; width: 98%;">
        <tr>
            <td width="25%" style="border-color: white;border-right: none !important;"><strong>No. Surat</strong></td>
            <td width="25%" style="border-color: white;border-left: none !important;"><strong> : </strong>{{$dataSuratMasuk->nmr_surat}}</td>
            <td width="25%" style="border-color: white;border-right: none !important;"><strong></strong></td>
            <td width="25%" style="border-color: white;border-left: none !important;"><strong></strong></td>
        </tr>

        <tr>
            <td width="25%" style="border-color: white;border-right: none !important;"><strong>Tanggal Surat</strong></td>
            <td width="25%" style="border-color: white;border-left: none !important;"><strong> : </strong>{{Carbon\Carbon::parse($dataSuratMasuk->tgl_surat)->formatLocalized('%A, %d %B %Y')}}</td>
            <td width="25%" style="border-color: white;border-right: none !important;"><strong></strong></td>
            <td width="25%" style="border-color: white;border-left: none !important;"><strong></strong></td>
        </tr>

        <tr>
            <td width="25%" style="border-color: white;border-right: none !important;"><strong>Asal</strong></td>
            <td width="25%" style="border-color: white;border-left: none !important;"><strong> : </strong>{{$dataSuratMasuk->asal_surat}}</td>
            <td width="25%" style="border-color: white;border-right: none !important;"><strong></strong></td>
            <td width="25%" style="border-color: white;border-left: none !important;"><strong></strong></td>
        </tr>

        <tr>
            <td width="25%" style="border-color: white;border-right: none !important;"><strong>Ringkasan</strong></td>
            <td width="25%" style="border-color: white;border-left: none !important;"><strong> : </strong>{{$dataSuratMasuk->ringkasan}}</td>
            <td width="25%" style="border-color: white;border-right: none !important;"><strong></strong></td>
            <td width="25%" style="border-color: white;border-left: none !important;"><strong></strong></td>
        </tr>

        <tr>
            <td width="25%" style="border-color: white;border-right: none !important;"><strong>Lampiran</strong></td>
            <td width="73%" style="border-color: white;border-left: none !important;"><strong> : </strong>{{$dataSuratMasuk->lampiran}}</td>
            <td width="1%" style="border-color: white;border-right: none !important;"><strong></strong></td>
            <td width="1%" style="border-color: white;border-left: none !important;"><strong></strong></td>
        </tr>

    </table>
    <br>
    <table border="1" style="text-align: center; border-collapse: collapse; width: 98%;">
        <tr>
            <td><strong>Disposisi</strong></td>
            <td><strong>Diteruskan Kepada</strong></td>
            <td><strong>Paraf</strong></td>
        </tr>
        <tr>
            <td style="width: 33%;">
                @foreach($dataDisp as $data)
                    {{$data->isi_disposisi}}
                    <br>
                @endforeach
            </td>
            <td style="text-align: left;width: 33%;">
                1. Ka. Sub Bagian Tata Usaha<br>
                2. Ka. Seksi Infrastruktur Pertanahan<br>
                3. Ka. Seksi Hubungan Hukum Pertanahan<br>
                4. Ka. Seksi Penataan Pertanahan<br>
                5. Ka. Seksi Pengadaan Tanah<br>
                6. Ka. Seksi Penanganan Masalah dan Pengendalian Pertanahan<br>
                7. Sekretaris
            </td>
            <td style="width: 33%;"></td>
        </tr>
        <tr>
            <td colspan="3"><strong>Catatan: Dilarang memisahkan sehelai suratpun yang tergabung dalam berkas ini.</strong></td>
        </tr>
        <tr>
            <td width="25%" style="border-color: white;border-right: none !important;"><strong></strong></td>
            <td width="25%" style="border-color: white;border-left: none !important;"><strong></strong></td>
            <td width="25%" style="border-color: white;text-align: right;">printed by Sumaker.</td>
        </tr>
    </table>

</center>