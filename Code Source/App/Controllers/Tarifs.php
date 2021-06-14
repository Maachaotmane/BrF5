<?php

class Tarifs extends Controller
{
    public function __construct()
    {
        $this->tarif = $this->model('Tarif');
    }

    public function tarif()
    {
        $tarifs = $this->tarif->getTarif();

        $this->view('Pages/tarif', [
            'tarifs' => $tarifs,
        ]);
    }

    public function edittarif($id)
    {
        $tarifs = $this->tarif->getTarifbyid($id);

        $this->view('Pages/edittarif', [
            'tarifs' => $tarifs,
        ]);
    }

    public function update($id)
    {
        $prix = $_POST['prix'];
        $this->tarif->update($id, $prix);

        $tarifs = $this->tarif->getTarif();

        $this->view('Pages/tarif', [
            'tarifs' => $tarifs,
        ]);
    }

    public function check($id)
    {
        $typebien = $_POST['typebien'.$id];

        if ($typebien == 'Chambre') {
            $typechambre = $_POST['typechambre'.$id];
            if ($typechambre == '1') {
                $typeVue = $_POST['typeVue'.$id];
                $tarifs = $this->tarif->typechambre($typebien, $typechambre, $typeVue);
            } elseif ($typechambre == '0') {
                $typelit = $_POST['typelit'.$id];
                if ($typelit == '0') {
                    $tarifs = $this->tarif->typechambre($typebien, $typechambre, 'int', $typelit);
                } elseif ($typelit == '1') {
                    $typeVueDouble = $_POST['typeVueDouble'.$id];
                    $tarifs = $this->tarif->typechambre($typebien, $typechambre, $typeVueDouble, $typelit);
                }
            }
        } else {
            $tarifs = $this->tarif->typechambre($typebien);
        }

        echo json_encode($tarifs);
    }

    public function insertReservation()
    {
        session_start();
        $tarifs = $this->tarif->insertReservation(
            $_SESSION['user_id'],
            $_POST['bien_id'],
            $_POST['startDate'],
            $_POST['endDate'],
            $_POST['enfant'],
            $_POST['pension'],
            $_POST['prix_final'],
            $_POST['unid'],
        );
        $success = 'success';
        echo json_encode($success);
    }
}
