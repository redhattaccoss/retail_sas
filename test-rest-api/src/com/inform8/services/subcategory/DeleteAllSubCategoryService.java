package com.inform8.services.subcategory;

import com.inform8.services.Service;
import com.inform8.services.StaticConfig;

public class DeleteAllSubCategoryService extends Service {
	public void deleteAll(){
		this.load(StaticConfig.host+"/rest.php?call=/subcategory/deleteAll");
		
	}
}
