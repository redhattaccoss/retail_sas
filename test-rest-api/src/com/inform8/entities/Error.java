package com.inform8.entities;

public class Error {
	private String name = "";
	private String message = "";
	private String code = "";
	private String field = "";
	public void setName(String name) {
		this.name = name;
	}
	public String getName() {
		return name;
	}
	public void setCode(String code) {
		this.code = code;
	}
	public String getCode() {
		return code;
	}
	public void setMessage(String message) {
		this.message = message;
	}
	public String getMessage() {
		return message;
	}
	public void setField(String field) {
		this.field = field;
	}
	public String getField() {
		return field;
	}
}
