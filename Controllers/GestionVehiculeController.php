<?php
require_once "Models\GestionVehiculeModel.php";

class VehiculeController
{
    public function get_vehicules($id)
    {
        $model = new VehiculeModel();
        $res = $model->get_vehicules($id);
        return $res;
    }
}
?>
