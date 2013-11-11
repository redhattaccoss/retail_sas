package com.inform8.entities;

public class Response extends ErrorData{
	private boolean result = false;
	private String npk = "";
	private String errorCode = "";
	
	public void setResult(boolean result) {
		this.result = result;
	}

	public boolean isResult() {
		return result;
	}

	public void setNpk(String npk) {
		this.npk = npk;
	}

	public String getNpk() {
		return npk;
	}

	public void setErrorCode(String errorCode) {
		this.errorCode = errorCode;
	}

	public String getErrorCode() {
		return errorCode;
	}
}
