package com.inform8.services.wholesaler;

import com.inform8.services.Service;
import com.inform8.services.StaticConfig;

public class DeleteAllWholesalerService extends Service {

	public void deleteAll(){
		this.load(StaticConfig.host+"/rest.php?call=/wholesaler/deleteAll");
		
	}
	
}
