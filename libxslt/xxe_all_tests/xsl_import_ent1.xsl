<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:import href="xsl_import_ent2.xsl"/>
  <xsl:template match="/" mode="xxe">
    <xsl:call-template name="xxe"/>
  </xsl:template>
  <xsl:template match="/">
        <xsl:apply-templates select="/" mode="xxe"/>
  </xsl:template>
</xsl:stylesheet>