<?php


class UangTabungan
{
    public $jumlah_uang;
    public $pecahan_100000;
    public $pecahan_50000;
    public $pecahan_20000;
    public $pecahan_5000;
    public $pecahan_100;
    public $pecahan_50;
    public $total_pecahan_100000;
    public $total_pecahan_50000;
    public $total_pecahan_20000;
    public $total_pecahan_5000;
    public $total_pecahan_100;
    public $total_pecahan_50;
    public $pecahan = [
        100000,
        50000,
        20000,
        5000,
        100,
        50
    ];
    public function __construct(int $int)
    {
        $this->jumlah_uang = $int;
        $this->hitungPecahan();
    }

    public function  hitungPecahan(){
        $total = $this->jumlah_uang / $this->pecahan[0];
        $jumlah_lembar_pecahan = floor($total);
        $this->setPecahan100000($jumlah_lembar_pecahan);
        $jumlah_pecahan = $jumlah_lembar_pecahan * $this->pecahan[0];
        $jumlah_uang = $this->jumlah_uang - $jumlah_pecahan;
        $this->setTotalPecahan100000($jumlah_pecahan);

        $total = $jumlah_uang / $this->pecahan[1];
        $jumlah_lembar_pecahan = floor($total);
        $this->setPecahan50000($jumlah_lembar_pecahan);
        $jumlah_pecahan = $jumlah_lembar_pecahan * $this->pecahan[1];
        $jumlah_uang = $jumlah_uang - $jumlah_pecahan;
        $this->setTotalPecahan50000($jumlah_pecahan);

        $total = $jumlah_uang / $this->pecahan[2];
        $jumlah_lembar_pecahan = floor($total);
        $this->setPecahan20000($jumlah_lembar_pecahan);
        $jumlah_pecahan = $jumlah_lembar_pecahan * $this->pecahan[2];
        $jumlah_uang = $jumlah_uang - $jumlah_pecahan;
        $this->setTotalPecahan20000($jumlah_pecahan);

        $total = $jumlah_uang / $this->pecahan[3];
        $jumlah_lembar_pecahan = floor($total);
        $this->setPecahan5000($jumlah_lembar_pecahan);
        $jumlah_pecahan = $jumlah_lembar_pecahan * $this->pecahan[3];
        $jumlah_uang = $jumlah_uang - $jumlah_pecahan;
        $this->setTotalPecahan5000($jumlah_pecahan);

        $total = $jumlah_uang / $this->pecahan[4];
        $jumlah_lembar_pecahan = floor($total);
        $this->setPecahan100($jumlah_lembar_pecahan);
        $jumlah_pecahan = $jumlah_lembar_pecahan * $this->pecahan[4];
        $jumlah_uang = $jumlah_uang - $jumlah_pecahan;
        $this->setTotalPecahan100($jumlah_pecahan);

        $total = $jumlah_uang / $this->pecahan[5];
        $jumlah_lembar_pecahan = floor($total);
        $this->setPecahan50($jumlah_lembar_pecahan);
        $jumlah_pecahan = $jumlah_lembar_pecahan * $this->pecahan[5];
        $this->setTotalPecahan50($jumlah_pecahan);
    }

    public function getTotalPecahan100000()
    {
        return $this->total_pecahan_100000;
    }

    public function setTotalPecahan100000($total_pecahan_100000): void
    {
        $this->total_pecahan_100000 = $total_pecahan_100000;
    }

    public function getTotalPecahan50000()
    {
        return $this->total_pecahan_50000;
    }

    public function setTotalPecahan50000($total_pecahan_50000): void
    {
        $this->total_pecahan_50000 = $total_pecahan_50000;
    }

    public function getTotalPecahan20000()
    {
        return $this->total_pecahan_20000;
    }

    public function setTotalPecahan20000($total_pecahan_20000): void
    {
        $this->total_pecahan_20000 = $total_pecahan_20000;
    }

    public function getTotalPecahan5000()
    {
        return $this->total_pecahan_5000;
    }

    public function setTotalPecahan5000($total_pecahan_5000): void
    {
        $this->total_pecahan_5000 = $total_pecahan_5000;
    }

    public function getTotalPecahan100()
    {
        return $this->total_pecahan_100;
    }

    public function setTotalPecahan100($total_pecahan_100): void
    {
        $this->total_pecahan_100 = $total_pecahan_100;
    }

    public function getTotalPecahan50()
    {
        return $this->total_pecahan_50;
    }

    public function setTotalPecahan50($total_pecahan_50): void
    {
        $this->total_pecahan_50 = $total_pecahan_50;
    }


    public function getPecahan100000()
    {
        return $this->pecahan_100000;
    }

    public function setPecahan100000($pecahan_100000): void
    {
        $this->pecahan_100000 = $pecahan_100000;
    }

    public function getPecahan50000()
    {
        return $this->pecahan_50000;
    }

    public function setPecahan50000($pecahan_50000): void
    {
        $this->pecahan_50000 = $pecahan_50000;
    }

    public function getPecahan20000()
    {
        return $this->pecahan_20000;
    }

    public function setPecahan20000($pecahan_20000): void
    {
        $this->pecahan_20000 = $pecahan_20000;
    }

    public function getPecahan5000()
    {
        return $this->pecahan_5000;
    }

    public function setPecahan5000($pecahan_5000): void
    {
        $this->pecahan_5000 = $pecahan_5000;
    }

    public function getPecahan100()
    {
        return $this->pecahan_100;
    }

    public function setPecahan100($pecahan_100): void
    {
        $this->pecahan_100 = $pecahan_100;
    }

    public function getPecahan50()
    {
        return $this->pecahan_50;
    }

    public function setPecahan50($pecahan_50): void
    {
        $this->pecahan_50 = $pecahan_50;
    }

    public function getJumlahUang()
    {
        return $this->jumlah_uang;
    }

    public function setJumlahUang($jumlah_uang): void
    {
        $this->jumlah_uang = $jumlah_uang;
    }


}