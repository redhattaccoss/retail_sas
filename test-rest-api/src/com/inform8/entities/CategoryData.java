package com.inform8.entities;

import java.util.List;

public class CategoryData extends ErrorData{
	private List<Category> categories = null;


	public void setCategories(List<Category> categories) {
		this.categories = categories;
	}

	public List<Category> getCategories() {
		return categories;
	}

	
}
