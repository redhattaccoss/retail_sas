package com.inform8.entities;

public class Wholesaler {
	private int id = 0;
	private int wholesalerTypeId = 0;
	private String name = "";
	private String contactName = "";
	private String contactEmail = "";
	private String website = "";
	private String blog = "";
	private String rating = "";
	private String username = "";
	private String password = "";
	private String enabled = "";
	
	public void setId(int id) {
		this.id = id;
	}
	public int getId() {
		return id;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getName() {
		return name;
	}
	public void setContactName(String contactName) {
		this.contactName = contactName;
	}
	public String getContactName() {
		return contactName;
	}
	public void setContactEmail(String contactEmail) {
		this.contactEmail = contactEmail;
	}
	public String getContactEmail() {
		return contactEmail;
	}
	public void setWebsite(String website) {
		this.website = website;
	}
	public String getWebsite() {
		return website;
	}
	public void setBlog(String blog) {
		this.blog = blog;
	}
	public String getBlog() {
		if (blog==null){
			return "";
		}
		return blog;
	}
	public void setRating(String rating) {
		this.rating = rating;
	}
	public String getRating() {
		return rating;
	}
	public void setUsername(String username) {
		this.username = username;
	}
	public String getUsername() {
		return username;
	}
	public void setPassword(String password) {
		this.password = password;
	}
	public String getPassword() {
		return password;
	}
	public void setWholesalerTypeId(int wholesalerTypeId) {
		this.wholesalerTypeId = wholesalerTypeId;
	}
	public int getWholesalerTypeId() {
		return wholesalerTypeId;
	}
	public void setEnabled(String enabled) {
		this.enabled = enabled;
	}
	public String getEnabled() {
		return enabled;
	}
}
