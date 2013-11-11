package com.inform8.entities;

import java.util.List;

public class SubCategoryData {
	private List<Category> subCategories = null;

	public void setSubCategories(List<Category> subCategories) {
		this.subCategories = subCategories;
	}

	public List<Category> getSubCategories() {
		return subCategories;
	}

}
