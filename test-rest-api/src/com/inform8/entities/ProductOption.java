package com.inform8.entities;

public class ProductOption {
	private int id = 0;
	private float wholesalePrice = 0;
	private float saleWholesalePrice = 0;
	private int productId = 0;
	public void setProductId(int productId) {
		this.productId = productId;
	}
	public int getProductId() {
		return productId;
	}
	public void setSaleWholesalePrice(float saleWholesalePrice) {
		this.saleWholesalePrice = saleWholesalePrice;
	}
	public float getSaleWholesalePrice() {
		return saleWholesalePrice;
	}
	public void setWholesalePrice(float wholesalePrice) {
		this.wholesalePrice = wholesalePrice;
	}
	public float getWholesalePrice() {
		return wholesalePrice;
	}
	public void setId(int id) {
		this.id = id;
	}
	public int getId() {
		return id;
	}
}
