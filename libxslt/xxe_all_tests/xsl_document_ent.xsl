<?xml version="1.0" encoding="UTF-8"?>
<xsl:transform
  version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
>
  <xsl:template match="/">
     <xxe xmlns="http://www.w3.org/1999/xhtml">
     <b>/etc/passwd: <br/></b><xsl:copy-of select="document('xsl_document_ent.txt')/xxe"/>
     </xxe>
  </xsl:template>
</xsl:transform>


