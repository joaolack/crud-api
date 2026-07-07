import { defineConfig } from 'vite';

export default defineConfig({
  root: 'src',            // index.html fica em src/
  server: {
    port: 8080,           // bate com o $allowedOrigins da API
    strictPort: true,     // não troca de porta se 8080 estiver ocupada
  },
  build: {
    outDir: '../dist',    // gera o build na raiz, fora de src/
    emptyOutDir: true,    // limpa dist/ antes de cada build
  },
});