<?php
class Suggestion
{
	private $suggestion_id;
	private $suggestion_name;
	private $suggestion_email;
	private $suggestion_subject;
	private $suggestion_message;

	
	public function getSuggestionId()
	{
		return $this->suggestion_id;
	}
	public function setSuggestionId($suggestion_id)
	{
		$this->suggestion_id=$suggestion_id;
	}
	public function getSuggestionName()
	{
		return $this->suggestion_name;
	}
	public function setSuggestionName($suggestion_name)
	{
		$this->suggestion_name=$suggestion_name;
	}
	public function getSuggestionEmail()
	{
		return $this->suggestion_email;
	}
	public function setSuggestionEmail($suggestion_email)
	{
		$this->suggestion_email=$suggestion_email;
	}
	public function getSuggestionSubject()
	{
		return $this->suggestion_subject;
	}
	public function setSuggestionSubject($suggestion_subject)
	{
		$this->suggestion_subject=$suggestion_subject;
	}
	public function getSuggestionMessage()
	{
		return $this->suggestion_message;
	}
	public function setSuggestionMessage($suggestion_message)
	{
		$this->suggestion_message=$suggestion_message;
	}
		
}