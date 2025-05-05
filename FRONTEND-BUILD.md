# Building Frontend Assets for Production

This guide explains how to build frontend assets locally for production deployment.

## Prerequisites

- Node.js installed locally
- NPM (Node Package Manager)
- Project dependencies installed

## Local Build Process

1. **Install Dependencies**
   ```bash
   npm install
   ```

2. **Build Assets for Production**
   ```bash
   npm run build
   ```
   This command will:
   - Compile and minify JavaScript
   - Process and optimize CSS with Tailwind
   - Generate versioned assets in `public/build`
   - Create a manifest file for Laravel to reference

## Production Deployment

After building assets locally:

1. The following directories/files should be deployed to production:
   - `public/build/` directory (contains compiled assets)
   - `public/build/manifest.json` (for Laravel's asset versioning)

2. You don't need to:
   - Deploy `node_modules/`
   - Install Node.js on production
   - Run npm commands on production

## Best Practices

1. **Version Control**
   - Commit the compiled assets in `public/build/`
   - Include `node_modules/` in `.gitignore`

2. **Deployment**
   - Always build assets before deploying
   - Verify manifest.json is included in deployments
   - Keep source files in `resources/` for future updates

## Troubleshooting

If you encounter issues:

1. **Missing Assets**
   - Ensure `npm run build` completed successfully
   - Check if `public/build/manifest.json` exists
   - Verify asset paths in blade templates

2. **Build Errors**
   - Clear local cache: `npm cache clean --force`
   - Remove and reinstall dependencies:
     ```bash
     rm -rf node_modules
     rm package-lock.json
     npm install
     ```

3. **Asset Loading Issues**
   - Check browser console for 404 errors
   - Verify Vite configuration in `vite.config.js`
   - Ensure proper asset inclusion in blade templates

## Maintenance

To update frontend assets:

1. Make changes to source files in `resources/`
2. Run `npm run build` locally
3. Commit and deploy the updated `public/build/` directory

Remember: Never run npm commands on production - always build locally and deploy the compiled assets.
