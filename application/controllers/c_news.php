<?php
class C_news extends CI_Controller {
function index()
{
$this->accueil();
}
function accueil ()
{
$this->load->model('m_news');
$data=$this->m_news->get_info();
$this->load->view('v_accueil',$data);
}

function testAjout ()
{
$this->load->model('m_news');
$data=$this->m_news->ajouter('Romain', 'Romain toi', 'oui');
}

function testModifier ()
{
$this->load->model('m_news');
$data=$this->m_news->modifier(1, 'Romain moi', 'non');
}

function testSupprimer ()
{
$this->load->model('m_news');
$data=$this->m_news->supprimer(1);
}

function testCount ()
{
$this->load->model('m_news');
$data['compteur']=$this->m_news->count (array ('auteur' => 'Hergé'));
$this->load->view('v_compte',$data);
}

function lister_news()
{
$this->load->model('m_news');
$data['liste']=$this->m_news->lister();
$this->load->view('v_lister',$data);
}

function form_ajouter_news ()
{
$this->load->view('v_ajout');
}

function ajouter_news()
{
$this->load->model('m_news');
$data=$this->m_news->ajouter($_POST['auteur'],$_POST['titre'],$_POST['contenu']);
$this->lister_news();
}
/* End of file Hello.php */
/* Location: ./application/controllers/Hello.php */
}
?>