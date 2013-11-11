package com.inform8.entities;

public class LineItem {
	private float price = 0;
	private float priceExtGst = 0;
	private int quantity = 0;
	private float subtotal = 0;
	private float subtotalExtGst = 0;
	private ProductOption productOption = null;
	
	public void setSubtotalExtGst(float subtotalExtGst) {
		this.subtotalExtGst = subtotalExtGst;
	}
	public float getSubtotalExtGst() {
		return subtotalExtGst;
	}
	public void setSubtotal(float subtotal) {
		this.subtotal = subtotal;
	}
	public float getSubtotal() {
		return subtotal;
	}
	public void setQuantity(int quantity) {
		this.quantity = quantity;
	}
	public int getQuantity() {
		return quantity;
	}
	public void setPriceExtGst(float priceExtGst) {
		this.priceExtGst = priceExtGst;
	}
	public float getPriceExtGst() {
		return priceExtGst;
	}
	public void setPrice(float price) {
		this.price = price;
	}
	public float getPrice() {
		return price;
	}
	public void setProductOption(ProductOption productOption) {
		this.productOption = productOption;
	}
	public ProductOption getProductOption() {
		return productOption;
	}
	
}
