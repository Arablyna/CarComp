<?php
class SignUpView
{
    public function SignUp()
    {
        ?>
        <div class='user-management-container'>
            <h1>Ajouter Utilisateur</h1>

            <!-- Formulaire d'ajout d'utilisateur -->
            <div class='add-user-form'>
                <form action="./apirouteController.php" method="post" onsubmit="return confirm('Do you really want to submit the form?');">
                    <label for="username">username:</label>
                    <input type="text" name="username" required>
                    <br>
            
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" required>
                    <br>

                    <label for="prenom">Prenom:</label>
                    <input type="text" name="prenom" required>
                    <br>

                    <label for="sexe">Sexe:</label>
                    <select name="sexe" required>
                        <option value="male">Male</option>
                        <option value="femelle">Femelle</option>
                    </select>
                    <br>

                    <label for="motDePasse">Mot de Passe:</label>
                    <input type="password" name="motDePasse" required>
                    <br>

                    <button type='submit' onclick="this.form.submit()" name="usersubmit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
                </form>
            </div>
        </div>
        <?php
    }
}
