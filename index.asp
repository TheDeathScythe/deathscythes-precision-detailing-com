<%EnableSessionState=False
host = Request.ServerVariables("HTTP_HOST")

if host = "scythesprecisiondetailing.com" or host = "www.scythesprecisiondetailing.com" then
response.redirect("https://www.scythesprecisiondetailing.com/")

else
response.redirect("https://www.scythesprecisiondetailing.com/error.htm")

end if
%>