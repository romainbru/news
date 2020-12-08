<?php
class Hello extends CI_Controller {
function index()
{
$this->accueil();
}
function accueil ()
{
$this->load->view('news/helloMessage.php');
}
function accueilChaleureux()
{
$this->load->view('news/helloChaleureux.php');
}
function accueilPersonnalise($unPseudo)
{
	$data=array();// creation d'un tableau $data pour transmettre les données à une vue
	$data['pren']=$unPseudo;
	$this->load->view('news/helloPersonnalise.php',$data); // $data transmis à la vue helloPersonnalise
}
function accueilFormel($uneCivilite,$unPrenom,$unNom)
{
	$data=array(); // creation d'un tableau $data pour transmettre les données à une vue
	$data['civilite']=$uneCivilite;
	$data['prenom']=$unPrenom;
	$data['nom']=$unNom;
	$this->load->view('news/helloFormel.php',$data); // $data transmis à la vue helloFormel
}

}
/* End of file Hello.php */
/* Location: ./application/controllers/Hello.php */
?>
