<?php  
class M_news extends CI_Model
{
	public function get_info()
	{
		//	On simule l'envoi du résultat d'une requête
		return array('auteur' => 'Gaston Lagaff',
		'titre' => 'Un premier modèle',
		'contenu' => ' Mon premier modèle simule une requête' ,
		'dateaj' => '24/07/20',
		'datemo' => '28/07/20');
	}

	private $table='news';

	public function ajouter ($auteur, $titre, $contenu)
		{
			return $this->db->set('auteur', $auteur)
			->set('titre',   $titre)
			->set('contenu', $contenu)
			->set('date_ajout', 'NOW()', false)
			->set('date_modif', 'NOW()', false)
			->insert($this->table);
	     }

	public function modifier($idP, $titre = null, $contenu = null)
	// =null: valeur par défaut si aucune nouvelle valeur fournie
	{
		// Aucune nouvelle valeur fournie
		if($titre == null AND $contenu == null)
		{
			return false;
		}
		if($titre != null)
		{
			$this->db->set('titre', $titre);
		}
		if($contenu != null)
		{
			$this->db->set('contenu', $contenu);
		}
		$this->db->set('date_modif', 'NOW()', false);
	
		// La condition pour modifier la news ayant pour id $id
		$this->db->where('id', (int) $idP);
	
		return $this->db->update($this->table);
	}

	public function supprimer($idN)
	{
		// La condition pour modifier la news ayant pour id $id
		$this->db->where('id', (int) $idN);
		return $this->db->delete($this->table);
	}

	public function count($where = array())
	{
	return (int) $this->db->where($where)
	->count_all_results($this->table);
	}

	public function lister ($nb = 10, $debut = 0)
	{
	return $this->db->select('*')
	->from($this->table)
	->limit($nb, $debut)
	->order_by('id', 'desc')
	->get()
	->result();
	}

}
?>
