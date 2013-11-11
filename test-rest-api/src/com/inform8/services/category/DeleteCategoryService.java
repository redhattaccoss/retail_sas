package com.inform8.services.category;

import com.inform8.services.Service;
import com.inform8.services.StaticConfig;

public class DeleteCategoryService extends Service {
	public void deleteAll(){
		this.load(StaticConfig.host+"/rest.php?call=/category/deleteAll");
		
	}
}
