<?php
class ImagenForm extends CFormModel{
    public $foto;
	public $extension;
    
    public function rules()
    {
        return array(
           array('foto','file','types'=>'jpg, jpeg, png, gif'),
		   array('extension','safe')
            );
    }
    
    public function attributeLabels()
	{
		return array(
                        'foto'=>'Foto',			
		);
	}
    
}
?>
