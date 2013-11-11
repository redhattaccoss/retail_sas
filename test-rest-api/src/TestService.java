import com.inform8.services.category.CategoryListService;


public class TestService {
	public static void main(String [] args){
		CategoryListService service = new CategoryListService();
		service.getAll();
	}
}
