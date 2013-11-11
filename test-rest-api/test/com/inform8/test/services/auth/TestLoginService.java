package com.inform8.test.services.auth;

import org.junit.Test;

import com.inform8.services.auth.LoginService;

import junit.framework.TestCase;

public class TestLoginService extends TestCase {

	public void setUp(){
		
	}
	
	@Test
	/**
	 * Test Login - should be authenticate
	 */
	public void testLogin(){
		LoginService ls = new LoginService();
		ls.login("ryan", "test");
	}
}
