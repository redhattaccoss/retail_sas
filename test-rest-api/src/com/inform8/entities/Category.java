package com.inform8.entities;

import java.util.List;

/**
 * Test Entity for Category object
 * @author Allanaire Tapion
 *
 */
public class Category {
	private String name = "";
	
	private String shortUrl = "";
	
	private String enabled = "0";
	
	private String wholesaleEnabled = "0";
	
	private String topPromoHtml = "";
	
	private String bottomPromoHtml = "";
	
	private int viewOrder = 0;
	
	private int id = 0;
	
	private List<SubCategory> subCategories;
	
	public Category(){

	}
	
	public void setName(String name) {
		this.name = name;
	}

	public String getName() {
		return name;
	}

	public void setShortUrl(String shortUrl) {
		this.shortUrl = shortUrl;
	}

	public String getShortUrl() {
		return shortUrl;
	}

	public void setEnabled(String enabled) {
		this.enabled = enabled;
	}

	public String isEnabled() {
		return enabled;
	}

	public void setWholesaleEnabled(String wholesaleEnabled) {
		this.wholesaleEnabled = wholesaleEnabled;
	}

	public String isWholesaleEnabled() {
		return wholesaleEnabled;
	}

	public void setTopPromoHtml(String topPromoHtml) {
		this.topPromoHtml = topPromoHtml;
	}

	public String getTopPromoHtml() {
		return topPromoHtml;
	}

	public void setBottomPromoHtml(String bottomPromoHtml) {
		this.bottomPromoHtml = bottomPromoHtml;
	}

	public String getBottomPromoHtml() {
		return bottomPromoHtml;
	}

	public void setViewOrder(int viewOrder) {
		this.viewOrder = viewOrder;
	}

	public int getViewOrder() {
		return viewOrder;
	}

	public void setSubCategories(List<SubCategory> subCategories) {
		this.subCategories = subCategories;
	}

	public List<SubCategory> getSubCategories() {
		return subCategories;
	}

	public void setId(int id) {
		this.id = id;
	}

	public int getId() {
		return id;
	}
	
	
}
