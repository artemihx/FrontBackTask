// vite.config.js
import { fileURLToPath, URL } from "node:url";
import { defineConfig } from "file:///C:/Users/%D0%A1%D1%82%D0%B0%D0%BD%D0%B8%D1%81%D0%BB%D0%B0%D0%B2/myProjects/frontbackweek/FrontBackTask/project/frontend/node_modules/vite/dist/node/index.js";
import vue from "file:///C:/Users/%D0%A1%D1%82%D0%B0%D0%BD%D0%B8%D1%81%D0%BB%D0%B0%D0%B2/myProjects/frontbackweek/FrontBackTask/project/frontend/node_modules/@vitejs/plugin-vue/dist/index.mjs";
import vueDevTools from "file:///C:/Users/%D0%A1%D1%82%D0%B0%D0%BD%D0%B8%D1%81%D0%BB%D0%B0%D0%B2/myProjects/frontbackweek/FrontBackTask/project/frontend/node_modules/vite-plugin-vue-devtools/dist/vite.mjs";
var __vite_injected_original_import_meta_url = "file:///C:/Users/%D0%A1%D1%82%D0%B0%D0%BD%D0%B8%D1%81%D0%BB%D0%B0%D0%B2/myProjects/frontbackweek/FrontBackTask/project/frontend/vite.config.js";
var vite_config_default = defineConfig({
  plugins: [
    vue(),
    vueDevTools()
  ],
  assetsInclude: ["**/*.ttf"],
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./src", __vite_injected_original_import_meta_url)),
      "~fonts": fileURLToPath(new URL("./fonts", __vite_injected_original_import_meta_url))
    }
  },
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: "@import '/src/assets/scss/index.scss';"
      }
    }
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJDOlxcXFxVc2Vyc1xcXFxcdTA0MjFcdTA0NDJcdTA0MzBcdTA0M0RcdTA0MzhcdTA0NDFcdTA0M0JcdTA0MzBcdTA0MzJcXFxcbXlQcm9qZWN0c1xcXFxmcm9udGJhY2t3ZWVrXFxcXEZyb250QmFja1Rhc2tcXFxccHJvamVjdFxcXFxmcm9udGVuZFwiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiQzpcXFxcVXNlcnNcXFxcXHUwNDIxXHUwNDQyXHUwNDMwXHUwNDNEXHUwNDM4XHUwNDQxXHUwNDNCXHUwNDMwXHUwNDMyXFxcXG15UHJvamVjdHNcXFxcZnJvbnRiYWNrd2Vla1xcXFxGcm9udEJhY2tUYXNrXFxcXHByb2plY3RcXFxcZnJvbnRlbmRcXFxcdml0ZS5jb25maWcuanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL0M6L1VzZXJzLyVEMCVBMSVEMSU4MiVEMCVCMCVEMCVCRCVEMCVCOCVEMSU4MSVEMCVCQiVEMCVCMCVEMCVCMi9teVByb2plY3RzL2Zyb250YmFja3dlZWsvRnJvbnRCYWNrVGFzay9wcm9qZWN0L2Zyb250ZW5kL3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZmlsZVVSTFRvUGF0aCwgVVJMIH0gZnJvbSAnbm9kZTp1cmwnXHJcblxyXG5pbXBvcnQgeyBkZWZpbmVDb25maWcgfSBmcm9tICd2aXRlJ1xyXG5pbXBvcnQgdnVlIGZyb20gJ0B2aXRlanMvcGx1Z2luLXZ1ZSdcclxuaW1wb3J0IHZ1ZURldlRvb2xzIGZyb20gJ3ZpdGUtcGx1Z2luLXZ1ZS1kZXZ0b29scydcclxuXHJcbi8vIGh0dHBzOi8vdml0ZS5kZXYvY29uZmlnL1xyXG5leHBvcnQgZGVmYXVsdCBkZWZpbmVDb25maWcoe1xyXG4gIHBsdWdpbnM6IFtcclxuICAgIHZ1ZSgpLFxyXG4gICAgdnVlRGV2VG9vbHMoKSxcclxuICBdLFxyXG4gIGFzc2V0c0luY2x1ZGU6IFsnKiovKi50dGYnXSxcclxuICByZXNvbHZlOiB7XHJcbiAgICBhbGlhczoge1xyXG4gICAgICAnQCc6IGZpbGVVUkxUb1BhdGgobmV3IFVSTCgnLi9zcmMnLCBpbXBvcnQubWV0YS51cmwpKSxcclxuICAgICAgJ35mb250cyc6IGZpbGVVUkxUb1BhdGgobmV3IFVSTCgnLi9mb250cycsIGltcG9ydC5tZXRhLnVybCkpXHJcbiAgICB9LFxyXG4gIH0sXHJcbiAgY3NzOntcclxuICAgIHByZXByb2Nlc3Nvck9wdGlvbnM6IHtcclxuICAgICAgc2Nzczoge1xyXG4gICAgICAgIGFkZGl0aW9uYWxEYXRhOiBcIkBpbXBvcnQgJy9zcmMvYXNzZXRzL3Njc3MvaW5kZXguc2Nzcyc7XCJcclxuICAgICAgfVxyXG4gICAgfVxyXG4gIH1cclxufSlcclxuIl0sCiAgIm1hcHBpbmdzIjogIjtBQUE2YyxTQUFTLGVBQWUsV0FBVztBQUVoZixTQUFTLG9CQUFvQjtBQUM3QixPQUFPLFNBQVM7QUFDaEIsT0FBTyxpQkFBaUI7QUFKbVAsSUFBTSwyQ0FBMkM7QUFPNVQsSUFBTyxzQkFBUSxhQUFhO0FBQUEsRUFDMUIsU0FBUztBQUFBLElBQ1AsSUFBSTtBQUFBLElBQ0osWUFBWTtBQUFBLEVBQ2Q7QUFBQSxFQUNBLGVBQWUsQ0FBQyxVQUFVO0FBQUEsRUFDMUIsU0FBUztBQUFBLElBQ1AsT0FBTztBQUFBLE1BQ0wsS0FBSyxjQUFjLElBQUksSUFBSSxTQUFTLHdDQUFlLENBQUM7QUFBQSxNQUNwRCxVQUFVLGNBQWMsSUFBSSxJQUFJLFdBQVcsd0NBQWUsQ0FBQztBQUFBLElBQzdEO0FBQUEsRUFDRjtBQUFBLEVBQ0EsS0FBSTtBQUFBLElBQ0YscUJBQXFCO0FBQUEsTUFDbkIsTUFBTTtBQUFBLFFBQ0osZ0JBQWdCO0FBQUEsTUFDbEI7QUFBQSxJQUNGO0FBQUEsRUFDRjtBQUNGLENBQUM7IiwKICAibmFtZXMiOiBbXQp9Cg==
