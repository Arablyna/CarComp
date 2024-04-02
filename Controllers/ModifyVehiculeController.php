<?php
// Include the model
include "Models\ModifyVehiculeModel.php";

class ModifyVehiculeController {
    public function getVehicule($id) {
        $model = new ModifyVehiculeModel();
        $r = $model->get_vehicule($id);
        return $r;
    }
}
?>