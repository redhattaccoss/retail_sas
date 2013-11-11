

import com.inform8.test.services.category.TestCategoryListService;
import com.inform8.test.services.category.TestConsumerCategoryListService;
import com.inform8.test.services.category.TestGetCategoryService;
import com.inform8.test.services.category.TestNewCategoryService;
import com.inform8.test.services.category.TestUpdateCategoryService;
import com.inform8.test.services.category.TestWholesaleCategoryListService;
import com.inform8.test.services.subcategory.TestNewSubCategoryService;
import com.inform8.test.services.wholesaler.TestNewWholesalerService;
import com.inform8.test.services.wholesaler.TestUpdateWholesalerService;
import com.inform8.test.services.wholesaler.TestWholesalerListService;

import junit.framework.Test;
import junit.framework.TestSuite;

public class AllTests {

	public static Test suite() {
		
		
		
		TestSuite suite = new TestSuite(AllTests.class.getName());
		//$JUnit-BEGIN$
		
		
		
		suite.addTestSuite(TestNewCategoryService.class);
		suite.addTestSuite(TestUpdateCategoryService.class);
		suite.addTestSuite(TestWholesaleCategoryListService.class);
		suite.addTestSuite(TestCategoryListService.class);
		suite.addTestSuite(TestConsumerCategoryListService.class);
		suite.addTestSuite(TestGetCategoryService.class);
		suite.addTestSuite(TestNewSubCategoryService.class);
		suite.addTestSuite(TestUpdateCategoryService.class);
		suite.addTestSuite(TestNewWholesalerService.class);
		suite.addTestSuite(TestUpdateWholesalerService.class);
		suite.addTestSuite(TestWholesalerListService.class);
		
		//$JUnit-END$
		return suite;
	}

}
