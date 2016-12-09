<?php



	class Config 
	{
		
		public static function get($path = null) 
		{
			
			if ($path) 
			{
				
				$configuration = $GLOBALS['configuration'];
				$path	= explode('/', $path);

				foreach ($path as $section) 
				{
					
					if (isset($configuration[$section])) 
					{
						
						$configuration = $configuration[$section];
						
					}
					
				}

				return $configuration;
				
			}
			
			return false;
			
		}
		
	}
	
	
	
?>